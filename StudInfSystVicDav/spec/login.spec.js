var Browser = require("zombie");
var url = "http://localhost:8000/";
var browser = new Browser();

describe("testing login", function() {

    it("should have defined headless browser", function(next){
        expect(typeof browser != "undefined").toBe(true); //assertion 1
        expect(browser instanceof Browser).toBe(true); //assertion 2
        next();
    });


    it("should visit the site and see the login form", function(next) {
        browser.visit(url, function(err) {
            expect(browser.success).toBe(true);
            expect(browser.assert.text('title', 'Sistema de Información Estudiantil'));
            browser.clickLink('#initSession', function(){
            	expect(browser.query("input[id='email']")).toBeDefined();
            	expect(browser.query("input[id='password']")).toBeDefined();
            	browser.fill("input[id='email']", "admin@admin.com");
            	browser.fill("input[id='password']", "chelseadota");
            	browser.pressButton("button[type='submit']", function(){
            		expect(browser.query("div[id='content']").innerHTML).toContain("Página Principal");

            		next();
            	})

            });
        })
    });

});
