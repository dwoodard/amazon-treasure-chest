# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"


Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

    config.vm.box = "base"
    config.vm.hostname = "dev"
    config.vm.network "private_network", ip: "33.33.33.11"
    config.ssh.forward_agent = true
    config.vm.network :forwarded_port, guest: 80, host: 180
    config.vm.network :forwarded_port, guest: 443, host: 1443
    config.vm.network :forwarded_port, guest: 3306, host: 13306


    #config.ssh.forward_agent = true

	#config.vm.box_url = "http://files.vagrantup.com/precise32.box"
	config.vm.box_url = "http://files.vagrantup.com/precise64.box"


	config.vm.provider :virtualbox do |vb|
	  #vb.customize ["modifyvm", :id, "--memory", "512"]
	  vb.customize ["modifyvm", :id, "--memory", "1024"]
	  #vb.customize ["modifyvm", :id, "--memory", "4096"]
	end

    config.vm.provision :shell, :path => "install.sh"

end