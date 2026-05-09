# Sprint-1-User-Authentication
Sprint 1 : User Authentication
-Init source code Laravel 12
-Commit and push to branch develop
-Resource about topics:
-Routing : https://laravel.com/docs/12.x/routing 
-Controller : https://laravel.com/docs/12.x/controllers 
-Middleware: https://laravel.com/docs/12.x/middleware 
-Requests : https://laravel.com/docs/12.x/requests 
-Responses: https://laravel.com/docs/12.x/responses 
-Validation : https://laravel.com/docs/12.x/validation 
-Model : https://laravel.com/docs/12.x/eloquent 
-DB - Seeding: https://laravel.com/docs/12.x/database 
-Resource: https://laravel.com/docs/12.x/eloquent-resources#generating-resources 
-Email: https://laravel.com/docs/12.x/mail 
-Queue: https://laravel.com/docs/12.x/queues 
-Require Feature:
-Read and understand each topic.
-Build APIs register/forgot password. Send email confirmation after registering to activate the account. Send link update password to email, link will expire after 5 minutes.
-Build APIs login/logout.
-Build APIs CRUD products/variants (require login)
user must login to call APIs CRUD products/variants
C: create
Require use Request validation data 
Create products: One product must have at least one variant (max is 100 variants).
Create variants: user can create more variants for product
Import: User can import file csv to bulk create product
R: read

Require use Resource to format data response
Detail: user can view information detail of one product or variant object. 
List: 
List products: Users can view a list of products. Users can search by title, filter by tag, status. User can change pagination (default: 10 item/per page, user can change up to 100 item per page)
List variants: Users can view a list of variants in a product. User can change pagination (default: 10 item/per page, user can change up to 100 item per page)Export: user can export list products
export all products
export all products based on result filter (ex:filter product has status is active and export all result)
export products in specific page (ex: no filter and export products in page 3 | or filter product has tag is “spring” and export product in page 2)
export specific products: user can select one or multiple product to export 
U: update
Require use Request validation data 
Update products/variants: User can update products/variants
Bulk action:
Add tag: User can select multiple product and add tag to them
D: delete
Delete products: when a product has been deleted (use soft delete), all variants also have been deleted (use soft delete). User can restore products has been deleted
Delete variants: users can delete variants in the product (hard delete), but can not delete if this is the last variant.
Product {
	id: auto_increment
	title: string, required
	description: text, optional
	slug: string, required, unique, auto generate base on title 
	(ex: title:“Apps Cyclone” => slug: “apps-cyclone”)
	tags: string, optional
	status: enum (active, draft)
}
one product has many variants (min 1, max 100)
Variant {
	id: auto_increment
	product_id: bigInt
	title: string, auto generate  (concat option_1, option_2, option_3)
	ex: option_1:”s”, option_2:”red”, option_3:”oxy”
	=> title: “s / red / oxy”
	ex: option_1:”s”, option_2:”red”
	=> title: “s / red”
	ex: option_1:”s”
	=> title: “s”
	price: double/float
	position: int
	compare_at_price: double/float
	option_1: string, required
	option_2: string, optional
	option_3: string, optional
	inventory_quantity: int
	image_url: string, optional
}
Example: Product object 
