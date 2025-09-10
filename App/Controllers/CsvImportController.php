<?php

namespace App\Controllers;


use Framework\Database;
use League\Csv\Reader;
use League\Csv\Statement;


class CsvImportController
{


    protected Database $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {


        loadView('csv-import/index', [
        ]);

        return null;
    }


    /**
     * Handle CSV file upload and import process
     *
     * @return void
     * @throws Exception
     */
    public function store(): void
    {
        $success = false;
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
            $file = $_FILES['csv_file'];

            // Check for upload errors and validate the file type
            if ($file['error'] === UPLOAD_ERR_OK && pathinfo($file['name'], PATHINFO_EXTENSION) === 'csv') {
                $tmpName = $file['tmp_name'];


                try {

                    $csv = Reader::createFromPath($tmpName, 'r');
                    $csv->setHeaderOffset(0); // The first row contains headers

                    // Extract the header (field names)
                    $headers = $csv->getHeader();
                    unset($headers['wikiDataId']);


                    $allowedFields = ['id', 'name', 'state_id', 'state_code', 'state_name',
                        'country_id', 'country_code', 'country_name',
                        'latitude', 'longitude',];
                    $fields = [];
                    $values = [];


                    $existingCategoryQuery = "INSERT INTO cities (
                        id, name, state_id, state_code, state_name,
                        country_id, country_code, country_name, 
                        latitude, longitude
                    ) VALUES (:id, :name, :state_id, :state_code, :state_name, 
                            :country_id, :country_code, :country_name, 
                            :latitude, :longitude)";


                    // Loop through the rows and map them to key-value pairs
                    $this->db->beginTransaction(); // Start transaction for batch insert

                    foreach ($csv as $key=>$row) {

                        if ((int)$key % 100 === 0) {
                            $this->db->endTransaction(); // Commit transaction
                            $this->db->beginTransaction(); // Start transaction for batch insert
                        }
                        // Map the row to key-value pairs using the headers
                        $data = array_intersect_key($row, array_flip($headers));

                        // Eliminate the wikiDataId by removing the corresponding key
                        unset($data['wikiDataId']);


                        // Trim values (optional)
                        $data = array_map('trim', $data);

                        // Insert data into the database
                        $this->db->query($existingCategoryQuery, $data);
                    }

                    $this->db->endTransaction(); // Commit transaction

                    $success = true;
                } catch (Exception $e) {
                    $error = 'Failed to process the CSV file: ' . $e->getMessage();
                }


            } else {
                $error = 'Please upload a valid CSV file.';
            }
        }

        // Load the appropriate view with data (success or errors)
        loadView('csv-import/index', [
            'success' => $success,
            'error' => $error
        ]);
    }


}
