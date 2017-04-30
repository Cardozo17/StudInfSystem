SRC = ./StudInfSystVicDav
USERATHOST = baquiano@web600.webfaction.com
DEPLOYDIR = webapps/studinfsystvicdav

deploy:
	rsync -av --delete \
	      --exclude=/storage \
	      --exclude=/bootstrap \
	      --exclude=/public/schoolLogo \
	      --exclude=/public/studentsPictures \
	      --exclude=/public/images \
	      $(SRC)/ $(USERATHOST):$(DEPLOYDIR)
