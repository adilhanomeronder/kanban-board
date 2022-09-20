# Kanban Board with Laravel 9 & Jquery
-----
## İçindekiler

* [Kurulum](#item1)
* [Ekran Görüntüleri](#item2)

<a name="item1"></a>
## Kurulum:

Depoyu klonlayın, bağımlılıkları yükleyin.

    $ git clone https://github.com/adilhanomeronder/kanban-board && cd kanban-board
    $ composer update

.env.example dosyasını .env olarak değiştirin ve veritabanızı ayarlarınızı ve path ayarlarınızı düzenleyin. Sonrasında aşağıdaki kodları sırasıyla çalıştırın.

    $ php artisan migrate
    $ php artisan db:seed
    $ php artisan key:generate
    $ php artisan serve

Boardlara ulaşmak için [http://127.0.0.1:8000](http://127.0.0.1:8000)

-----

<a name="item2"></a>
## Ekran Görüntüleri:

![Dashboard](https://programyukle.net/upload/kanban-board/dashboard.gif)





