set :application, "devThis"
set :domain,      "dev-this.com"
set :deploy_to,   "/home/wesley/domains/#{domain}/public_html"
set :app_path,    "app"
set :use_sudo,    false

set :repository,  "git@github.com:jeroenrietveld/devThis.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`
set :branch,      "master"

set :writable_dirs,   ["app/cache", "app/logs",]

set :keep_releases,    3
set :update_vendors,   false
set :interactive_mode, false

set :model_manager, "doctrine"
# Or: `propel`

default_run_options[:pty] = true
set :ssh_options, { :forward_agent => true }
ssh_options[:keys] = %w('~/.ssh/id_rsa.pub')
ssh_options[:port] = "5678"
set :user,           "root"

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Symfony2 migrations will run

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL