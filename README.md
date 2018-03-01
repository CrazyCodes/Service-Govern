# 前言
* 这是一款基于Swoole的服务治理架构
* 我的服务治理仅仅是使用了概念，并非是大型企业中完善的服务治理框架，请酌情使用在生产环境中

# 服务治理构成
* Swoole - 异步网络通信引擎 (即RPC) [https://www.swoole.com/]
* Supervisor - 进程管理 [http://www.supervisord.org/]
* PHP7+ [http://php.net/]

# 安装

### composer
```
composer require myservices/rpc
```

### Git
```
git clone https://github.com/CrazyCodes/Rpc-Plugin.git
```

# 配置文件

配置文件 your_path/config/app.php

* app_name 项目目录
* base_path 根目录
* develop_path 开发者目录
* production_path 生产环境目录
* server_ip 服务监听IP
* server_port 服务监听端口
* server_notify_port 服务监听回调端口
* management_center_ip 服务治理中心IP (服务治理中心正在Coding)
* management_center_port 服务治理中心端口
* monitoring_center_ip 监控/日志中心IP (监控/日志中心正在Coding)
* monitoring_center_port 监控/日志中心端口

# 部署

```
$client = new \Rpc\RpcProvider(当前项目的根目录);

/**
 * @ 启动监听
 */
$client->server ();

/**
 * @ 请求提供者 （生产模式）
 */
$production = $client->client ('UserService');
var_dump ($production->getUserInfo (['name' => 111]));

/**
 * @ 请求提供者 （开发模式）
 */
$dev = $client->devClient ('UserService');
var_dump ($dev->getUserInfo (['name' => 111]));

```

# 监听

SwooleTcpServer 只能在CLI中执行，所以我选择使用Supervisor做进程管理

# 致谢
周梦康 [https://mengkang.net/]

Swoole [https://www.swoole.com/]
