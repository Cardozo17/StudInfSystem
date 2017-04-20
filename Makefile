SRC = ./StudInfSystVicDav
USERATHOST = baquiano@web600.webfaction.com
DEPLOYDIR = webapps/studinfsystvicdav

deploy:
	rsync -av --delete $(SRC)/ $(USERATHOST):$(DEPLOYDIR)
