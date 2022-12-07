以下題目請盡量使用 Laravel 特性實現，資料庫可以依照經驗進行合理設計

- 請設計一組 Todo List 的 API，功能包含新建、修改、刪除、完成

- 接續題目一，請加入用戶的功能，用戶可以使用 Email 及密碼註冊，登入後可以操作自己的 Todo List

- 接續題目二，用戶完成任務後，每日發送一則完成狀況通知信給用戶，內容包含今日新增、今日完成、剩餘項目等


- 今日新增
  - item 1
  - item 2
  - item 3
- 今日完成
  - item 1
  - item 2
  - item 3
- 剩餘項目

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


