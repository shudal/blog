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

