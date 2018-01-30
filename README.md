# 前言
* 为了服务治理未来的扩容，将批量部署N个服务提供者，所以准备了基于Laravel Command的一个很小的启动包
* 我的服务治理使用的Tcp服务器是鸟哥大神写的Swoole
# 安装
使用composer安装
```
composer require myservices/tcp_server_for_laravel
```
# 配置
将启动器配置到项目中才会生效
## Lumen
bootstrap/app.php 文件
```php
$app->register (Tcp\ServerServiceProvider::class);
```
## Laravel
config/app.php providers 的数组中新增
```php
Tcp\ServerServiceProvider::class
```
# 配置项
在.env文件中，你需要配置俩个变量
```
TCP_SERVER_URL=127.0.0.1  // tcp 地址
TCP_SERVER_PORT=9503      // tcp 端口
```

# 启动与监控
配置完成后，使用命令
```
php artisan start
```
即可启动Tcp Server,但如果想后台监控进程，我选用的是Supervisor