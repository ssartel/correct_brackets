<h3>Задача 1:</h3>
Составьте программу, которая проверяет корректность баланса скобок в арифметическом выражении, т.е. что скобки установлены верно и правильно их вхождение, то есть если скобки так расположены [({})] , то это правильное вхождение, а вот [([) - неверное. Входной параметр - Строка - арифметическое выражение; Выходной параметр - "Верно";"Не верно". Использовать функцию eval нельзя.


Метод, выполняющий проверку находится в классе Modules/Check/Controllers/IndexController.php
<hr>
<h3>Задача 2:</h3>
Напишите запрос, отыскивающий неуникальные значения id в таблице CREATE TABLE (id int not null, name text);

```sql
SELECT id, name FROM `table` GROUP BY id HAVING COUNT(id) > 1;
```