#デプロイ用

##はじめに

Laravel アプリケーションを /var/www/... に配置するスクリプトです。構成管理ツール「Ansible」を使用しています。

##要件

- ansible が入っていること。

```
$ sudo pip install ansible
```

##使用方法

```
$ ./publish.pl
```

- パスワードなしで sudo できるユーザーか、もしくは root で実行します。
- フルパスで実行しても、この playbook.yml が使用されます。
