{{include file='./Base/RootHeader.tpl'}}

<div class="span9">
    <form method="POST">
        <div id="cntContact">
            <div class="row-fluid">
                <div class="span4">
                    <div  class="bubble">
                        <p class="header">Your information</p>
                        <div class="wwell">
                            <input type="text" placeholder="Name" />
                            <input type="text" placeholder="E-Mail Address" />
                            <input type="text" placeholder="Subject" />
                        </div>
                    </div>
                    <div class="headers">
                        <div class="bubble">
                            <div class="wwell">
                                <address>
                                    <strong>Alternate Contact Details:</strong><br />
                                    <abbr title="Phone">P:</abbr> +44 1484 321853<br />
                                    <abbr title="Mobile">M:</abbr> +44 7413 773704<br />
                                    <abbr title="E-Mail">E:</abbr> wright.elliot@gmail.com
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span8">
                    <div class="bubble">
                        <p class="header">Your message</p>
                        <div class="wwell">
                            <textarea placeholder=" ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <input type="submit" class="btn btn-success pull-right" value="Send Message" />
        <div class="clearfix"></div>
    </form>
</div>

{{include file='./Base/RootFooter.tpl'}}
