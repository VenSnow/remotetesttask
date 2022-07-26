# **Remote Test Task**

### Установка:
1) `git pull https://github.com/VenSnow/remotetesttask.git`
2) `composer install`
3) `php artisan:key generate`
4) `php artisan migrate --seed`
5) `php artisan test` - Тестирование API

## **API**
1) #### Лоты
   `api/lots` - Вывод всех лотов с категориями и пагинацией

   `api/lots/{id}` - Вывод лота по `id` с категориями
2) #### Жанры
   `api/categories` - Вывод всех категорий

   `api/categories/{id}` - Вывод лотов по категории с `id` и с пагинацией
