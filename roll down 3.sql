/*
ROLL DOWN three times FROM BASE CUBE
product = brand -> description
time = day_number_in_month -> date
store = store_address -> store name
*/

SELECT t.date, t.day_number_in_month day_in_month, t.week_number_in_year week_in_year, p.description, p.brand brand, p.subcategory, s.name store_name, s.store_street_address, s.city, s.store_state, sum(sf.unit_sales) total_unit_sold, sum(sf.customer_count) customer_count,
sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit
FROM Grocery.`Sales Fact` sf, Product p, Store s, Time t, Promotion pr
where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key
group by s.name, p.description, t.date;

