<?php
class Database
{
    public $connection;

    public function __construct($config)
    {
        // $dsn = "mysql:host={$config['host']};
        //         port={$config['port']};
        //         dbname={$config['dbname']};
        //         user=root;
        //         charset={$config['charset']}";

        // host=localhost;port=3306;dbname=myapp
        $dsn = "mysql:host" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}
