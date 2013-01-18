openvbx-api-applet
==================

Allows a Applet to be added to a call flow to hit an API

Setup:

clone the repository to OpenVbx/plugins/
Create a flow, and you can add the Call Logger applet to a flow.  
You will be asked to specify a URL to hit

If you need to process authentication (which you will need for anything that isn't something you built yourself), you'll need to set that up in twiml.php
