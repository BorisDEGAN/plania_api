destinationFolder="/home/simple-hosting-arch"

sudo mkdir -p "${destinationFolder}/plannia"
sudo rsync -avhP --progress . "${destinationFolder}/plannia/" --exclude /.git   --exclude /.github   --exclude /public   --exclude /storage/*.key --exclude /vendor
sudo rsync -avhP --stats --progress ./public/ "${destinationFolder}/"

sed -i -e 's/\/\.\.\//\/plannia\//g' "${destinationFolder}/index.php"
