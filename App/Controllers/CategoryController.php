<?php
/**
 * Category Controller
 *
 * Implement the BREAD functionality for Categories
 *
 * Filename:        CategoryController.php
 * Location:
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    28/08/2025
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

namespace App\Controllers;

use Framework\Authorisation;
use Framework\Database;
use Framework\Session;
use Framework\Validation;
use JetBrains\PhpStorm\NoReturn;
use League\HTMLToMarkdown\HtmlConverter;


class CategoryController
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

        $keywords = isset($_GET['keywords']) ? trim($_GET['keywords']) : '';

        $query = "SELECT c.id,  c.title,  c.description, c.created_at, c.updated_at  
                  FROM categories c
                  WHERE c.title LIKE :keywords OR c.description LIKE :keywords ORDER BY (c.id = 1) DESC, c.title ASC";

        $params = [
            'keywords' => "%{$keywords}%",
        ];

        $categories = $this->db->query($query, $params)->fetchAll();

        $categoryCount = $this->db->query('SELECT count(id) as total FROM categories ')
            ->fetch();

        loadView('categories/index', [
            'categories' => $categories,
            'categoryCount' => $categoryCount,
            'keywords' => $keywords,
        ]);
    }


    /**
     * Show a single category
     *
     * @param  array  $params
     * @return void
     * @throws Exception
     */
    public function show(array $params): void
    {
        $id = $params['id'] ?? '';

        $categoryParams = [
            'id' => $id
        ];

        $sqlCategory = 'SELECT * FROM categories WHERE id = :id';
        $category = $this->db->query($sqlCategory, $categoryParams)->fetch();

        // Check if category exists
        if (!$category) {
            ErrorController::notFound('Category not found');
            return;
        }

        // TODO: This will need to be implemented when the Jokes feature has been completed. 
        $categoryJokeCount = 0;

        loadView('categories/show', [
            'category' => $category,
            'joke_count' => $categoryJokeCount,
        ]);
    }


    /**
     * Show the create category form
     *
     * @return void
     */
    public function create(): void
    {
        loadView('categories/create', []);
    }


    /**
     * Store data in database
     *
     * @return void
     * @throws Exception
     */
    #[NoReturn]
    public function store()
    {

        $allowedFields = ['title', 'description',];
        $fields = [];
        $values = [];

        $newCategoryData = array_intersect_key($_POST, array_flip($allowedFields));
        $newCategoryData['user_id'] = Session::get('user')['id'];
        $newCategoryData = array_map('sanitize', $newCategoryData);

        // Extract the data from the form submission
        foreach ($newCategoryData as $field => $value) {
            $fields[] = $field;
            // Strip whitespace & convert empty strings to null
            $value = trim($value);
            if ($value === '' || $value === "<p>&nbsp;</p>") {
                $newCategoryData[$field] = null;
            }
            $values[] = ':'.$field;
        }

        $fields = implode(', ', $fields);
        $values = implode(', ', $values);

        // Validate there is a title
        $requiredFields = ['title',];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($newCategoryData[$field]) || !Validation::string($newCategoryData[$field])) {
                $errors[$field] = ucfirst($field).' is required';
            }
        }

        // Validate the Category title is unique
        $existingCategoryQuery = "SELECT id FROM categories WHERE title = :title LIMIT 1";
        $existingCategoryParams = [
            'title' => $newCategoryData['title'],
        ];
        $latestCategoryId = $this->db->query($existingCategoryQuery, $existingCategoryParams)->fetch();

        if (isset($latestCategoryId->id) && $latestCategoryId->id > 0) {
            $errors[$field] = ucfirst($newCategoryData['title']).' already exists';
        }

        if (!empty($errors)) {
            // Reload view with errors
            loadView('categories/create', [
                'errors' => $errors,
                'category' => $newCategoryData
            ]);
        }


        // accept the Markdown from the form and store as HTML
        if (isset($newCategoryData['description'])) {

            $description = $newCategoryData['description'] ?? '';
            $markdown = htmlToMarkdown($description);
            $newCategoryData['description'] = $markdown;
        }


        // Save the submitted data
        $insertCategoryQuery = "INSERT INTO categories ({$fields}) VALUES ({$values})";
        $result = $this->db->query($insertCategoryQuery, $newCategoryData);

        // retrieve the just inserted category, using the data used for inserting
        $justAddedCategoryQuery = "SELECT id FROM categories WHERE title = :title LIMIT 1";
        $latestCategoryParams = [
            'title' => $newCategoryData['title'],
        ];

        $latestCategoryId = $this->db->query($justAddedCategoryQuery, $latestCategoryParams)->fetch();

        // Return a success flash message and display the categories
        Session::setFlashMessage('success_message', 'Category created successfully');
        redirect('/categories');
    }

    /**
     * Show the category edit form
     *
     * @param  array  $params
     * @return null
     * @throws Exception
     */
    public function edit(array $params): null
    {

        $id = $params['id'] ?? '';
        $category_id = $id;

        $params = [
            'id' => $id,
        ];

        $category = $this->db->query('SELECT * FROM categories WHERE categories.id = :id ', $params)->fetch();

        // Check if category exists
        if (!$category) {
            ErrorController::notFound('Category not found');
            exit();
        }

        // Not really required, but it provides a little protection
        // by using the category's retrieved user ID
        $category_id = $category->id;
        $user_id = $category->user_id;

        // Authorisation
        if (!Authorisation::isOwner($user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorized to update this category');

            return redirect('/categories/'.$category_id);
        }

        // Convert the category description ready for the editor
        $converter = new HtmlConverter();
        $category->description = $converter->convert($category->description ?? '');

        loadView('categories/edit', [
            'category' => $category,
            'category_id' => $category_id,
            "user_id" => $user_id,
        ]);

        return null;
    }

    /**
     * Update a category
     *
     * @param  array  $params
     * @throws Exception
     */
    #[NoReturn]
    public function update(array $params): void
    {
        $id = $params['id'] ?? '';

        $getCategoryParams = [
            'id' => $id
        ];

        $category = $this->db->query('SELECT * FROM categories WHERE id = :id', $getCategoryParams)->fetch();

        // Check if category exists
        if (!$category) {
            ErrorController::notFound('Category not found');
            exit();
        }

        // Authorisation
        if (!Authorisation::isOwner($category->user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorised to update this category');
            redirect('/categories/'.$category->id);
        }

        $allowedFields = ['id', 'title', 'description'];
        $updateValues = array_intersect_key($_POST, array_flip($allowedFields)) ?? [];
        $updateValues = array_map('sanitize', $updateValues);
        $requiredFields = ['title',];
        $errors = [];

        foreach ($requiredFields as $field) {
            if (empty($updateValues[$field]) || !Validation::string($updateValues[$field])) {
                $errors[$field] = ucfirst($field).' is required';
            }
        }

        if (!empty($errors)) {
            loadView('categories/edit', [
                'category' => $category,
                'errors' => $errors
            ]);
            exit;
        }

        if (isset($updateValues['description'])) {
            $description = $updateValues['description'] ?? '';
            $markdown = htmlToMarkdown($description);
            $updateValues['description'] = $markdown;
        }

        // Submit to database
        $updateFields = [];

        foreach (array_keys($updateValues) as $field) {
            $updateFields[] = "{$field} = :{$field}";
        }

        $updateFields = implode(', ', $updateFields);

        /* Update the Category */
        $updateQuery = "UPDATE categories SET $updateFields, updated_at = now() WHERE id = :id";

        $updateValues['id'] = $id;

        $this->db->query($updateQuery, $updateValues);

        // Set flash message
        Session::setFlashMessage('success_message', 'Category updated');

        redirect('/categories/'.$id);
    }


    /**
     * Show the category edit form
     *
     * @param  array  $params
     * @return null
     * @throws Exception
     */
    public function delete(array $params): null
    {

        $id = $params['id'] ?? '';
        $category_id = $id;

        $params = [
            'id' => $id,
        ];

        $category = $this->db->query('SELECT * FROM categories WHERE categories.id = :id ', $params)->fetch();

        // Check if category exists
        if (!$category) {
            ErrorController::notFound('Category not found');
            exit();
        }

        // Not really required, but it provides a little protection
        // by using the category's retrieved user ID
        $category_id = $category->id;
        $user_id = $category->user_id;

        // Authorisation
        if (!Authorisation::isOwner($user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorized to delete this category');

            return redirect('/categories/'.$category_id);
        }

        // Convert the category description ready for the editor
        $converter = new HtmlConverter();
        $category->description = $converter->convert($category->description ?? '');

        loadView('categories/delete', [
            'category' => $category,
            'category_id' => $category_id,
            "user_id" => $user_id,
        ]);

        return null;
    }

    public function destroy(array $params)
    {
        $id = $params['id'] ?? '';

        $getCategoryParams = [
            'id' => $id
        ];

        $removeCategoryQuery = "SELECT * FROM categories WHERE id = :id ";
        $category = $this->db->query($removeCategoryQuery, $getCategoryParams)->fetchAll();

        // Check if category exists
        if (!$category) {
            ErrorController::notFound('Category not found');
            exit();
        }

        // Authorisation
        if (isset($prodcut->user_id) && !Authorisation::isOwner($category->user_id)) {
            Session::setFlashMessage('error_message',
                'You are not authorised to update this category');
            return redirect('/categories/'.$category->id);
        }

        $removeCategoryQuery = "DELETE FROM categories WHERE id = :id ";

        $category = $this->db->query($removeCategoryQuery, $getCategoryParams)->fetch();

        // Set flash message
        Session::setFlashMessage('success_message', 'Category removed');

        redirect('/categories');
        return null;
    }

}