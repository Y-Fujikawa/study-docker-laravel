# study-docker-laravel
Laravelのローカル環境をDockerで作成するリポジトリ

## テスト
### 事前準備

1. MySQLに入りテスト用のデータベースを作成する。
2. `php artisan migrate --env=testing` を実行する。
3. `docker-compose app php artisan test` を実行する。
