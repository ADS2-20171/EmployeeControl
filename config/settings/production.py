from .base import *

DEBUG = False

#  ALLOWED_HOSTS = ["ip"]

ALLOWED_HOSTS = ["*"]

DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.postgresql_psycopg2',
        'NAME': "",
        'USER': "",
        'PASSWORD': "",
        'HOST': "",
        'PORT': "",

    }
}

STATIC_URL = '/static/'

#  Install mass apps INSTALLED_APPS + ["app install"]
