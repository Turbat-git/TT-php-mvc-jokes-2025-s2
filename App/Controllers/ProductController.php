<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        ProductController.php
 * Location:
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    22/08/2024
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

namespace App\Controllers;

use Exception;
use Framework\Authorisation;
use Framework\Database;
use Framework\Session;
use Framework\Validation;
use JetBrains\PhpStorm\NoReturn;
use League\HTMLToMarkdown\HtmlConverter;


class ProductController
{

    protected Database $db;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }


    /**
     * Produce home page
     *
     * @return void
     * @throws Exception
     */
    public function index(): void
    {
        $sql = "SELECT p.id,  p.name,  p.description,  p.price,  p.created_at,  COALESCE(cp.colour_id, 0) AS colour_id, c.oklch
                FROM  products p
                LEFT JOIN colour_product cp ON p.id = cp.product_id
                LEFT JOIN colours c ON cp.colour_id = c.id
                ORDER BY p.created_at DESC";

        $products = $this->db->query($sql)->fetchAll();

        loadView('products/index', [
            'products' => $products
        ]);
    }


    /**
     * Show a single product
     *
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function show(array $params): void
    {
        $id = $params['id'] ?? '';

        $productParams = [
            'id' => $id
        ];

        $sqlProduct = 'SELECT * FROM products WHERE id = :id';
        $product = $this->db->query($sqlProduct, $productParams)->fetch();

        // Check if product exists
        if (!$product) {
            ErrorController::notFound('Product not found');
            return;
        }

        $productId = $product->id;
        $sqlColourProduct = "
                SELECT colours.name as name, colours.id as id, colours.hex_code as hex_code,
                        colours.l as l , colours.c as c , colours.h as h, colours.oklch as oklch
                FROM colours, colour_product 
                WHERE colours.id = colour_product.colour_id AND colour_product.product_id = :product_id";
        $colourProductParams = [
            'product_id' => $productId,
        ];
        $productColour = $this->db->query($sqlColourProduct, $colourProductParams)->fetch();

        loadView('products/show', [
            'product' => $product,
            "product_colour" => $productColour,
        ]);
    }


    /**
     * Show the create product form
     *
     * @return void
     */
    public function create(): void
    {

        $sqlColours = 'SELECT id, name FROM colours ORDER BY name';
        $colours = $this->db->query($sqlColours)->fetchAll();
        $colour_count = count($colours);

        loadView('products/create', [
            "colours" => $colours, "colour_count" => $colour_count,
        ]);
    }


    /**
     * Store data in database
     *
     * @return void
     * @throws Exception
     */
    #[NoReturn] public function store()
    {
        $allowedFields = ['name', 'description', 'price', 'colour'];
        $newProductData = array_intersect_key($_POST, array_flip($allowedFields));

        $newProductData['user_id'] = Session::get('user')['id'];
        $newProductData = array_map('sanitize', $newProductData);


        $requiredFields = ['name', 'price', 'colour'];

        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newProductData[$field]) || !Validation::string($newProductData[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            // Reload view with errors
            loadView('products/create', [
                'errors' => $errors,
                'product' => $newProductData
            ]);
        }


        // Move the colour into a temporary variable, and remove from the parameter list
        $colour_id = $newProductData['colour'];
        unset($newProductData['colour']);

        if (isset($newProductData['price'])) {
            $newProductData['price'] = (float)$newProductData['price'] * 100;
        }

        // accept the Markdown from the form and store as HTML
        if (isset($newProductData['description'])) {

            $description = $newProductData['description'] ?? '';
            $markdown = htmlToMarkdown($description);
            $newProductData['description'] = $markdown;
        }


        // Save the submitted data
        $fields = [];
        $values = [];

        foreach ($newProductData as $field => $value) {
            $fields[] = $field;
            // Convert empty strings to null
            if ($value === '') {
                $newProductData[$field] = null;
            }
            $values[] = ':' . $field;
        }

        $fields = implode(', ', $fields);
        $values = implode(', ', $values);

        $insertProductQuery = "INSERT INTO products ({$fields}) VALUES ({$values})";
        $result = $this->db->query($insertProductQuery, $newProductData);

        // retrieve the just inserted product, using the data used for inserting
        $justAddedProductQuery = "SELECT id FROM products WHERE name = :name AND price = :price LIMIT 1";
                $latestProductParams = [
            'name' => $newProductData['name'],
            'price' => $newProductData['price'],
        ];
        $latestProductId = $this->db->query($justAddedProductQuery, $latestProductParams)->fetch();

        // Add the product colour to the colour_product table
        $insertColourProductParams = [
            'product_id' => $latestProductId->id,
            'colour_id' => $colour_id,
        ];

        // Create the Colour_Product insert parameter to placeholder map
        $colourProductFields = [];
        $colourProductValues = [];

        foreach ($insertColourProductParams as $field => $value) {
            $colourProductFields[] = $field;
            $colourProductValues[] = ':' . $field;
            if ($value === '') {
                $insertColourProductParams[$field] = null;
            }
        }

        $colourProductFields = implode(', ', $colourProductFields);
        $colourProductValues = implode(', ', $colourProductValues);

        $insertColourProductQuery = "INSERT INTO colour_product({$colourProductFields}) VALUES ({$colourProductValues})";

        $this->db->query($insertColourProductQuery, $insertColourProductParams)->fetch();


        // Return a success flash message and display the products
        Session::setFlashMessage('success_message', 'Product created successfully');
        redirect('/products');
    }

    /**
     * Show the product edit form
     *
     * @param array $params
     * @return null
     * @throws Exception
     */
    public function edit(array $params): null
    {

        $id = $params['id'] ?? '';
        $product_id = $id;

        $params = [
            'id' => $id,
        ];

        $product = $this->db->query('SELECT * FROM products WHERE products.id = :id ', $params)->fetch();

        // Check if product exists
        if (!$product) {
            ErrorController::notFound('Product not found');
            exit();
        }

        // Not really required, but it provides a little protection
        // by using the product's retrieved ID
        $product_id = $product->id;

        // Authorisation
        if (!Authorisation::isOwner($product->user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorized to update this product');
            return redirect('/products/' . $product_id);
        }

        // This query joins the products with the colour_product table to fetch the first
        // product, and it's associated colour, with the given product ID = product.id
        $productColour = $this->db->query('SELECT products.id, products.name, products.description, products.price, 
                                                  colour_product.colour_id as colour_id
                                           FROM products, colour_product 
                                           WHERE products.id = :id 
                                             AND products.id = colour_product.product_id',
            $params)->fetch();

        // get the selected product's colour, setting it to 0 if there is not a colour set.
        $colour_id = 0;
        if ($productColour) {
            $colour_id = $productColour->colour_id;
        }

        // Get the list of colours for the select box
        $sqlColours = 'SELECT id, name FROM colours ORDER BY name, l,c,h';
        $colours = $this->db->query($sqlColours)->fetchAll();
        $colour_count = count($colours);
        $converter = new HtmlConverter();

        // Convert the product description ready for the editor
        $product->description = $converter->convert($product->description ?? '');

        loadView('products/edit', [
            'product' => $product,
            'product_id' => $product_id,
            "colours" => $colours,
            "colour_id" => $colour_id,
            "colour_count" => $colour_count,
        ]);
        return null;
    }

    /**
     * Update a product
     *
     * @param array $params
     * @return null
     * @throws Exception
     */
    #[NoReturn] public function update(array $params): null
    {
        $id = $params['id'] ?? '';

        $getProductParams = [
            'id' => $id
        ];

        $product = $this->db->query('SELECT * FROM products WHERE id = :id', $getProductParams)->fetch();

        // Check if product exists
        if (!$product) {
            ErrorController::notFound('Product not found');
            exit();
        }

        // Authorisation
        if (!Authorisation::isOwner($product->user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorised to update this product');
            return redirect('/products/' . $product->id);
        }

        $allowedFields = ['product_id', 'name', 'description', 'price', 'colour'];
        $updateValues = array_intersect_key($_POST, array_flip($allowedFields)) ?? [];
        $updateValues = array_map('sanitize', $updateValues);
        $requiredFields = ['name', 'price', 'colour'];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field) . ' is required';
            }
        }

        if (!empty($errors)) {
            loadView('products/edit', [
                'product' => $product,
                'errors' => $errors
            ]);
            exit;
        }

        if (isset($updateValues['description'])) {
            $description = $updateValues['description'] ?? '';
            $markdown = htmlToMarkdown($description);
            $updateValues['description'] = $markdown;
        }

        if (isset($updateValues['price'])) {
            $updateValues['price'] = (float)$updateValues['price'] * 100;
        }

        $colour_id = $updateValues['colour'];
        unset($updateValues['colour']);
        $product_id = $updateValues['product_id'];
        unset($updateValues['product_id']);

        // Submit to database
        $updateFields = [];

        foreach (array_keys($updateValues) as $field) {
            $updateFields[] = "{$field} = :{$field}";
        }

        $updateFields = implode(', ', $updateFields);

        /* Update the Product */
        $updateQuery = "UPDATE products SET $updateFields WHERE id = :id";

        $updateValues['id'] = $id;

        $this->db->query($updateQuery, $updateValues);

        /* Update the Product Colour
         *
         * We will "simulate" a PUT HTTP METHOD for updating the product's colour.
         *     - get colour_product record
         *     - if there is a colour_product record, then delete it
         *     - insert a new colour_product
        */

        $updateFields = ['id', 'colour_id', 'product_id'];
        $updateValues = [];

        $colourProductSQL = "SELECT * from colour_product where product_id = :id and product_id = :product_id";
        $id = $params['id'] ?? '';
        $searchParams = [
            'id' => $id,
            'product_id' => $product_id,
        ];

        $colourProduct = $this->db->query($colourProductSQL, $searchParams)->fetch();


        if ($colourProduct) {
            $colourProductId = $colourProduct->id;
            $deleteParams = [
                'colourProductId' => $colourProductId,
            ];

            $removeColourProductQuery = "DELETE FROM colour_product where id = :colourProductId";
            $deleteResult = $this->db->query($removeColourProductQuery, $deleteParams);
        }

        $insertParams = [
            'product_id' => $product_id,
            'colour_id' => $colour_id,
        ];

        $updateQuery = "INSERT INTO colour_product(colour_id, product_id) VALUES( :colour_id, :product_id)";

        $updateResult = $this->db->query($updateQuery, $insertParams);


        // Set flash message
        Session::setFlashMessage('success_message', 'Product updated');

        redirect('/products/' . $id);

    }


    /**
     * Search products by keywords/location
     *
     * @return void
     * @throws Exception
     */
    public function search(): void
    {
        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';

        $query = "SELECT * FROM products WHERE name LIKE :keywords OR description LIKE :keywords ";

        $params = [
            'keywords' => "%{$keywords}%",
        ];

        $products = $this->db->query($query, $params)->fetchAll();

        loadView('/products/index', [
            'products' => $products,
            'keywords' => $keywords,
        ]);
    }

    public function destroy(array $params)
    {
        $id = $params['id'] ?? '';

        $getProductParams = [
            'id' => $id
        ];

        $removeProductColourQuery = "SELECT * FROM colour_product WHERE product_id = :id ";
        $removeProductQuery = "SELECT * FROM products WHERE id = :id ";

        $productColour = $this->db->query($removeProductColourQuery, $getProductParams)->fetchAll();
        $product = $this->db->query($removeProductQuery, $getProductParams)->fetchAll();

        // Check if product exists
        if (!$product) {
            ErrorController::notFound('Product not found');
            exit();
        }

        // Authorisation
        if (isset($prodcut->user_id) && !Authorisation::isOwner($product->user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorised to update this product');
            return redirect('/products/' . $product->id);
        }

        $removeProductColourQuery = "DELETE FROM colour_product WHERE product_id = :id ";
        $removeProductQuery = "DELETE FROM products WHERE id = :id ";

        $productColour = $this->db->query($removeProductColourQuery, $getProductParams)->fetch();
        $product = $this->db->query($removeProductQuery, $getProductParams)->fetch();

        // Set flash message
        Session::setFlashMessage('success_message', 'Product and Product Colours Removed');

        redirect('/products');
        return null;
    }

}