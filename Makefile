SRC = ./StudInfSystVicDav
USERATHOST = baquiano@web600.webfaction.com
DEPLOYDIR = webapps/studinfsystvicdav

deploy:
	rsync -av --delete --exclude=/storage --exclude=/bootstrap --exclude=/public $(SRC)/ $(USERATHOST):$(DEPLOYDIR)
