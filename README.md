# study-docker-laravel
Laravelのローカル環境をDockerで作成するリポジトリ

## Unit, Featureテスト
### 事前準備

1. MySQLに入りテスト用のデータベースを作成する。
2. `php artisan migrate --env=testing` を実行する。

## 実行
1. `docker-compose app php artisan test` を実行する。

## E2Eテスト
### 事前準備

1. Chromeをインストール

```
wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add -
sh -c 'echo "deb http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google.list'
apt-get update
apt-get install google-chrome-stable
```

2. `php artisan serve --env=dusk.local` を実行する。
3. 別タブを開き `php artisan dusk` を実行する。
