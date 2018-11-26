# thinkphp5.1框架 搭建的個人博客網站
### 功能簡介
* 主題功能
* 評論功能
* MarkDown編輯博文
* 驗證碼
* 控制某個分類的隱藏
* 新增自定義頁面
* 自定義css
* 網頁統計

### 運行環境：
* centos7
* php7.2
* mysql 5.7
* PDO PHP Extension
* MBstring PHP Extension

#### 運行環境搭建：
* [mysql5.7](https://blog.csdn.net/qq_34173549/article/details/79692591).
* centos7.2安裝php7.2
```
如果已經按照php,            
yum -y remove php*
更改yum源         
rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm   
rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm  
開始安裝(一勞永逸的安裝所有各種擴展：          
yum -y install php72w*
```
### 安裝步驟：
* 下載此倉庫到本地。如/home/perci/tp/tp5下
* 進入extend目錄，運行git clone https://github.com/SegmentFault/HyperDown
* 編輯application/common.php
    ,將其中的phd()函數的返回值改爲安裝目錄。如/home/perci/tp/tp5
* mysql數據庫新建如demo數據庫，導入demo.sql
* 修改config/database.php裏的數據庫名，數據庫賬戶密碼為您自己的
* 安裝完成
### 部署
[安装nginx](https://blog.csdn.net/peterxiaoq/article/details/72864566)
[部署](https://blog.csdn.net/qq_36431213/article/details/80456993#commentBox)
### DEMO
见[demo](http://132.232.57.130/)
![pic](https://perci-1253331419.cos.ap-chengdu.myqcloud.com/tp/20181117190123.png)
### 部分技术细节
* 主题功能
```
有一个写在app/common.php中的公共函数，这个函数从数据库中找到正在启用的主题，并返回此主题的主题文件夹名。
主题都放在view/下。
每一个控制器调用此函数得到主题文件夹名，再拼接自身视图文件名，从而得到完整的视图地址。
```
* 插件都使用钩子与行为技术实现。每个插件仅含有一个行为文件，放在app/index/behavior下
* markdown编辑功能的实现
```
使用SegmentFault的解析器将用markdown写下的文章转换为html显示出来
```
* 控制某个分类不显示在主页的插件
```
数据库中的分类表和文章表是关联的      
分类表和文章表都有一个字段用于判定是否显示出来      
插件通过改变这个表示状态的字段实现。
```
* 评论内容过滤插件的实现
```
待过滤关键词有一张表，插件可增加/删除某个关键词       
控制器将所有评论传给此插件的钩子，接着插件的行为文件逐个判定评论是否含带过滤关键词，接着从评论数组中删除那些非法评论
```
* 新增自定义页面
```
类似新增文章。
```
* 自定义css
```
控制器中埋下钩子，传给行为，行为返回css内容给控制器，控制价将css内容传给视图。
```
* 网页统计
```
控制器中埋下钩子，传给行为，行为处理（更新数据库中的相应统计数据）
```
