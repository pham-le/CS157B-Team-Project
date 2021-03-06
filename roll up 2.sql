/*
ROLL UP TWICE FROM BASE CUBE
product = department -> none
time = quarter -> year
store = sales_region -> none
*/

SELECT t.year, sum(sf.unit_sales) total_unit_sold, sum(sf.customer_count) customer_count,
sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit
FROM Grocery.`Sales Fact` sf, Product p, Store s, Time t, Promotion pr
where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key
group by t.year;

