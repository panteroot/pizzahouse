This is based from Net Ninja's Laravel tutorial (https://www.youtube.com/watch?v=LkQ7SeLh-DM&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=17). Tutorial used laravel6 so some packages needs to be refactored. Below are things modified:

Codes:
- Use of vite instead of laravel-mix for scss compile

Rules:
- Allows user to order pizza without toppings
- Small change in calling controller in routes
- Still used of calling auth middleware in PizzaController constructor but used except for actions (create and store)

Things to improve:
- 1 Order - N Pizza relationship
- Add update functionality