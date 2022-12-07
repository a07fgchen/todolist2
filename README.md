# 安裝啟動流程

```
composer install 
```

安裝npm package,以及編譯
```
npm install && npm run build
```
啟動 server
```
php artisan serve
```
erDiagram
    users ||--o{ todo_lists : hasMany
    todo_lists{
        bigint id PK 流水號
        bigint user_id FK 使用者id
        string title 代辦標題
        string content 代辦內容
        completed_at timestemp 完成時間
        created_at timestemp 創建時間
        deleted_at timestemp 刪除時間
    }

Api
    create:
    localhost/todolist
    request
    {
        title:'test',
        content:'test'
    }
    modify
        localhost/todolist/{id}



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
