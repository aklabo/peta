#デプロイ用

##はじめに

Laravel アプリケーションを /var/www/... に配置します。

##要件

- ansible が入っていること。

```
$ sudo pi install ansible
```

##使用方法

```
$ ./publish.pl
```

- フルパスで実行しても、この playbook.yml が使用されます。

