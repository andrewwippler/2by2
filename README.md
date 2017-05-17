# 2 by 2 - Personal Prospect Tracker
[![Build Status](https://travis-ci.org/andrewwippler/2by2.svg?branch=master)](https://travis-ci.org/andrewwippler/2by2)

This is my rendition of a personal prospect tracker for Soul Winning. You may [use my personal installation](https://2by2.andrewwippler.com), but you may want to set up your own to personalize all the options.

## Setup

```bash
cd /var/www/html
git clone https://github.com/andrewwippler/2by2.git
cd 2by2
cp .env{.example,}
# edit .env with database information
php artisan key:generate
composer install
php artisan migrate
php artisan db:seed
npm install
npm run production
```

Note: first registered user becomes admin.

## Todo:

- [ ] Personal Reports
- [ ] Site-wide Reporting
- [ ] Assign admin
- [ ] Team Leader Role (to view all in team)
- [ ] Sunday School Leader Role (to view all in SS)
- [ ] Ordering of items
- [ ] Contact history icons
- [ ] Metrics on actions done
- [ ] Un-delete Prospects items


# License

Copyright 2017 Andrew Wippler

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
