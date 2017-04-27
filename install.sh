echo "Please enter the code(id) for this Pi to the startup Site > "
read URL
let URL = "http://sagefirellc.net/touchntalkpro/talk?id=$URL"
echo "*** Creating Startup Scripts ***"
cd /home/pi
echo "Startup page > $URL"
echo "chromium-browser $URL" > script
sudo chmod 777 script
cd /home/pi/.config/lxsession/LXDE-pi/
echo "@./script" >> autostart
