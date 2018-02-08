# 前言
* 为了服务治理未来的扩容，将批量部署N个服务提供者，所以准备了基于Laravel Command的一个很小的启动包
* 我的服务治理仅仅是使用了概念，并发是大型企业中完善的服务治理，请酌情使用在生产环境中
# 服务治理使用的项目
* Supervisor - 进程管理 [http://www.supervisord.org/]
* Swoole - 异步网络通信引擎 (即RPC) [https://www.swoole.com/]
* Laravel/Lumen -  PHP开发框架 [https://laravel.com/]
* PHP7+
---
服务治理的Server端无需Nginx、Apache类似的服务代理
Swoole的receive方法将直接访问/app/Service，所有业务都需要在App/Service的命名空间下
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
Tcp\RpcServiceProvider::class
```
# 配置项
在.env文件中
```
TCP_SERVER_URL=127.0.0.1  // 提供者地址
TCP_SERVER_PORT=9503      // 提供者端口
// --------------------------|
CLIENT_SERVER_URL=127.0.0.1 // 消费者地址 (用于接收注册中心通知)
CLIENT_SERVER_PORT=9503     // 消费者端口
```

# 启动与监控
配置完成后，使用命令
```
php artisan start
```
