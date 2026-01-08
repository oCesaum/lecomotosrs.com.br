mv www.lucasautomoveisrs.com.br/* .
mv www.lucasautomoveisrs.com.br/.* .
mv www.lucasautomoveisrs.com.br/public/* public/
mv www.lucasautomoveisrs.com.br/public/.* public/
php artisan migrate --force
php artisan cache:clear
ls
rm -rf briefing.txt
rm -rf .git
rm -rf *.zip
rm -rf *.com.br
