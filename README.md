# lara-practice
Project for practicing Laravel + Vue JS knowledge. The project is very simple, there've been included simple CRUD stuff without AUTH or something. The APP is reactive with Vue, Vue just made that reactive, cool and fast.
## Get started
First you have to just clone the repository to your machine saying:
```BASH
git clone https://github.com/mrcat323/lara-practice
```
### Configuring
First generate a key:
```BASH
php artisan key:generate
```
### Database
Set up the **database**:
```BASH
cp .env.example .env
```
And change that DB details to yours, something like **DB_HOST**, **DB_DATABASE**, **DB_USERNAME**, **DB_PASSWORD**, also go to [config/database.php](https://github.com/mrcat323/lara-practice/blob/master/config/database.php) and change default driver:
https://github.com/mrcat323/lara-practice/blob/77e0584356179ff2e6706671728c28e5894fa5e7/config/database.php#L23
to yours, also change the driver's details of DB connection.
### Dependencies
Then install all composer & NPM dependencies:
```BASH
composer install
npm install
```
Simply compile them *(just in case)*:
```BASH
npm run dev
```
### DBs
You need the database to work with project, and that's why type:
```BASH
php artisan migrate
```
After that to simplify your work, not adding data to DB and wasting time, I prepared the seeders for you, just run:
```BASH
php artisan db:seed --class=PostsTableSeeder
```
If after running that you'll see such error like **Class not found** or something like that, say:
```BASH
composer dump-autoload
```
and then run the seeds again:
```BASH
php artisan db:seed --class=PostsTableSeeder
```
### Usage
**Simply just run**:
```BASH
php artisan serve
```
and test that out.
### Demo
Heh, how could I forget about demo. Just click [this link](https://radiant-hollows-95091.herokuapp.com/)
### Contribution
You also can contribute. If you noticed a bug, or wanna fix the issue helping me to save time or wanna add something yours, your, useful idea, just let me know that.
