/*
ROLL UP ONCE FROM BASE CUBE
product = category -> department
time = month -> quarter
store = store_state -> sales_region
*/

SELECT t.quarter, p.department, s.sales_region, sum(sf.unit_sales) total_unit_sold, sum(sf.customer_count) customer_count,
sum(sf.dollar_sales) revenue, (sum(sf.dollar_sales) - sum(sf.dollar_cost)) profit
FROM Grocery.`Sales Fact` sf, Product p, Store s, Time t, Promotion pr
where sf.product_key = p.product_key and sf.promotion_key = pr.promotion_key and sf.store_key = s.store_key and sf.time_key = t.time_key
group by s.sales_region, p.department, t.quarter;

