echo "Please enter URL of startup Site >"
read URL
echo "*** Creating Startup Scripts ***"
cd /home/pi
echo "Startup page > $URL"
echo "chromium-browser $URL" > script
sudo chmod 777 script
cd /home/pi/.config/lxsession/LXDE-pi/
echo "@./script" >> autostart