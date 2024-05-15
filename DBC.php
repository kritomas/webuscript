<?php

class DBC
{
	private static $CREDENTIALS = null;
    public static $SERVER_IP = null;
    public static $USER = null;
    public static $PASSWORD = null;
    public static $DATABASE = null;

    private static $connection = null;

    protected function __construct()
    {
    }

    public static function getConnection()
    {
		//error_reporting(E_ALL);
		//ini_set('display_errors', 'on');
		if (!self::$CREDENTIALS)
		{
			self::$CREDENTIALS = get_object_vars(json_decode(file_get_contents("sql_credentials.json")));
		   	self::$SERVER_IP = self::$CREDENTIALS["ip"];
		    self::$USER = self::$CREDENTIALS["user"];
		    self::$PASSWORD = self::$CREDENTIALS["password"];
		    self::$DATABASE = self::$CREDENTIALS["database"];
		}

        if (!self::$connection) {
            self::$connection = mysqli_connect(self::$SERVER_IP, self::$USER, self::$PASSWORD, self::$DATABASE);
            if (!self::$connection) {
                die('Could not connect to DB');
            }
        }
        return self::$connection;
    }

    public static function closeConnection()
    {
        if (self::$connection) {
            mysqli_close(self::$connection);
            self::$connection = null;
        }
    }
}
