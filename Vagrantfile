Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/bionic64"
  config.ssh.forward_agent = true

  config.vm.provider "virtualbox" do |vb|
     vb.memory = "1024"
  end

  # Provision box with php and composer
  config.vm.provision "shell", inline: <<-SHELL
    sudo apt-get update
    sudo apt-get install -y git vim zip php7.2 php7.2-xml php7.2-mbstring
    curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
    sudo -iu vagrant /usr/local/bin/composer --working-dir=/vagrant install
  SHELL
end
