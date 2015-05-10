/*
ROLL DOWN ONCE FROM BASE CUBE
product = category -> sub category
time = month -> week number in year
store = store_state -> city
*/

SELECT t.week_number_in_year, p.subcategory, s.city, sum(sf.unit_sales) total_unit_sold, sum(sf.customer_count) customer_count,
sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit
FROM Grocery.`Sales Fact` sf, Product p, Store s, Time t, Promotion pr
where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key
group by s.city, p.subcategory, t.week_number_in_year;

