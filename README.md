####  Запуск сервера
`symfony server:start`

#### Запуск скрипта c тестовым набором данных ( сервер должен быть включен)
`bin/console app:calculate-rank --url=http://127.0.0.1:8000/test`

#### Запуск скрипта c внешним источником данных, источник должен возвращать валидный JSON и `content-type` ответа `application/json`
`bin/console app:calculate-rank --url=ВАШ-URL`
