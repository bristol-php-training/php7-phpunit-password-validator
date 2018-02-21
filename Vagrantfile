Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/artful64"
  config.ssh.forward_agent = true


  # Uncomment line below (possibly updating IP address) if you want to map VM to an IP address on the host
  # config.vm.network "private_network", ip: "192.168.3.3"


  config.vm.provider "virtualbox" do |vb|
     vb.memory = "1024"
  end

  # Provision box with php and composer
  config.vm.provision "shell", inline: <<-SHELL
    sudo apt-get update
    sudo apt-get install -y git php7.1-cli php7.1-mbstring php7.1-xml php7.1-zip vim zip
    curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
    sudo -iu vagrant /usr/local/bin/composer --working-dir=/vagrant install
  SHELL
end
