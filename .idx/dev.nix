{ pkgs, ... }: {
  channel = "stable-23.11"; # or "unstable"
  packages = [
    pkgs.php82
    pkgs.php82Packages.composer
    pkgs.nodejs_20
    pkgs.mysql80
    pkgs.redis
    pkgs.git
    pkgs.nano
  ];
  env = {
    DB_HOST = "127.0.0.1";
    DB_PORT = "3306";
    DB_DATABASE = "stuvalley_db";
    REDIS_HOST = "127.0.0.1";
    REDIS_PORT = "6379";
  };
  idx = {
    extensions = [
      "bmewburn.vscode-intelephense-client"
      "bradlc.vscode-tailwindcss"
    ];
    previews = {
      enable = true;
      previews = {
        web = {
          command = ["php" "artisan" "serve" "--host=0.0.0.0" "--port=$PORT"];
          manager = "web";
        };
      };
    };
    workspace = {
      onCreate = {
        composer-install = "composer install";
        npm-install = "npm install";
        setup-env = "cp .env.example .env";
        key-generate = "php artisan key:generate";
      };
      
      onStart = {
        start-services = ''
          # Start MySQL
          mysqld --initialize-insecure --user=root --datadir=$HOME/mysql_data || true
          mysqld_safe --datadir=$HOME/mysql_data --port=3306 --socket=$HOME/mysql.sock &
          sleep 5

          # Start Redis
          redis-server --daemonize yes
        '';
      };
    };
  };
}
