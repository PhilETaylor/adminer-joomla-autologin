rm myjoomla-mysql.php
rm -Rf tmp
mkdir tmp
cd tmp
git clone git@github.com:vrana/adminer.git
cd adminer
git submodule update --init
php compile.php mysql en
cat ../../plugin.php > output.php
cat adminer-mysql-en.php >> output.php
mv output.php ../../myjoomla-mysql.php
cd ../../
mv myjoomla-mysql.php ~/Desktop/JOOMLA/myjoomla-mysql.php
rm -Rf tmp
