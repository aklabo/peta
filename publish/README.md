#デプロイ用

##はじめに

Laravel アプリケーションを /var/www/... に配置するスクリプトです。構成管理ツール「Ansible」を使用しています。

##要件

- Ansible が入っていること。

#####pip でインストールする

```
$ sudo pip install ansible
```

##使用方法

```
$ ./publish.pl
```

- パスワードなしで sudo できるユーザーか、もしくは root で実行します。
- フルパスで実行しても、このスクリプトと同じ場所にある Playbook が使用されます。

