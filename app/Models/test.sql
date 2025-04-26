SELECT *  FROM shippers;
SELECT     CategoryName ,Description FROM categories;
SELECT   LastName,FirstName,HireDate,Title  FROM employees WHERE Title="Sales Representative";
SELECT  FirstName,LastName,HireDate FROM employees WHERE Title="Sales Representative" AND Country="USA";
SELECT orderID,orderDate FROM orders WHERE EmployeeID=5;
SELECT SupplierID,ContactName,ContactTitle from suppliers WHERE  not ContactTitle="Marketing Manager";
-- but you want use not donc you shold search about hwo to use not   exercice 6

SELECT  ProductID,ProductName FROM products WHERE ProductName LIKE"%queso%";

-- like "% start";
-- like "end%";
-- like "% eny position  %";

SELECT  OrderID,CustomerID,ShipCountry FROM orders WHERE ShipCountry="Belgium" OR ShipCountry="France" ;

SELECT  OrderID,CustomerID,ShipCountry FROM orders WHERE ShipCountry IN ("France","Belgium") ;
SELECT  OrderID,CustomerID,ShipCountry FROM orders WHERE ShipCountry IN ("Brazil","Mexico","Argentina","Venezuela") ;
SELECT  FirstName,LastName,Title,BirthDate,EmployeeID FROM employees ORDER BY BirthDate ASC;
SELECT  FirstName,LastName,Title, date(BirthDate),EmployeeID FROM employees ORDER BY BirthDate ASC;
-- afiche year- moi-day
-- year() afiche just year 
alter table add column varchar (100);
update table set FullName= concat(FirstName,'',LastName);
concat("meriem","","elmecaniqui")= meriem elmecaniqui
UPDATE employees SET ana=CONCAT(LastName,'',FirstName) where 1=1;


-- oldest first  tazayodiyaaa 
--  desc tana9syan mathaln zi amzyan  employe ar am9ran 
SELECT   COUNT(*) AS TotalCustomers FROM Customers ;
SELECT   COUNT(CustomerID) AS TotalCustomers FROM Customers ;
SELECT OrderDate  FROM orders LIMIT 1 ;
-- verifier ca SELECT ContactTitle, COUNT( ContactTitle) AS COUNT  FROM customers GROUP BY ContactTitle;
SELECT products.ProductID , products.ProductName ,suppliers.CompanyName FROM products JOIN suppliers ON products.SupplierID= suppliers.SupplierID; 
SELECT categories.CategoryName,COUNT(categories.CategoryID) AS TotalProducts FROM products JOIN categories ON products.CategoryID=categories.CategoryID GROUP BY 
categories.CategoryName ORDER BY TotalProducts DESC;
SELECT categories.CategoryName,COUNT(products.ProductID) AS TotalProducts FROM products JOIN categories ON products.CategoryID=categories.CategoryID GROUP BY 
categories.CategoryName ORDER BY TotalProducts DESC;

