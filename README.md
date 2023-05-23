Есть студенты, есть классы, и есть лекции.

У студента есть имя и email (уникальный).
У класса есть название (уникальное).
У лекции есть тема (уникальная) и описание.

Студент может состоять только в одном классе.
В классе может быть много студентов.
У каждого класса есть учебный план состоящий из разных лекций, в учебном плане лекции не могут повторяться.
Разные классы проходят лекции в разном порядке.

Сделать API, в котором будут реализованы следующие методы:
1) получить список всех студентов +
2) получить информацию о конкретном студенте (имя, email + класс + прослушанные лекции) +
3) создать студента +
4) обновить студента (имя, принадлежность к классу) +
5) удалить студента +

6) получить список всех классов +
7) получить информацию о конкретном классе (название + студенты класса) +
8) получить учебный план (список лекций) для конкретного класса +
9) создать/обновить учебный план (очередность и состав лекций) для конкретного класса +
10) создать класс +
11) обновить класс (название) +
12) удалить класс (при удалении класса, привязанные студенты должны открепляться от класса, но не удаляться полностью из системы) +

13) получить список всех лекций +
14) получить информацию о конкретной лекции (тема, описание + какие классы прослушали лекцию + какие студенты прослушали лекцию) +
15) создать лекцию +
16) обновить лекцию (тема, описание) +
17) удалить лекцию +

Авторизацию делать не надо, фронт делать не надо, API должно быть публичным.

Технические требования:

1) Использовать везде строгую типизацию
2) В контроллерах не должно быть бизнес-логики. Контроллер должен только принимать объект реквеста, получать из него отвалидированные данные, вызывать метод модели или сервиса, отлавливать эксепшены и отдавать результат в формате JSON
3) Если есть сложная бизнес-логика, какие-то условия, которые выходят за рамки методов Eloquent, то их нужно вынести в сервисы. Сервис должен работать с моделью и реализовывать свои методы на основе методов модели или моделей с дополнением бизнес-логикой
4) Результат запроса к API должен возвращаться в формате JSON
5) Должна быть реализована валидация передаваемых в запросе к API данных, она должна быть вынесена в реквесты
6) В контроллерах и сервисах использовать Dependency Injection
7) Количество запросов должно быть оптимальным (использовать жадную загрузку для получения связанных данных)
