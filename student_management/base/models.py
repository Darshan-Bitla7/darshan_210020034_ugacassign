from django.db import models

class Student(models.Model):
    name = models.CharField(max_length=100, blank=False, null=False)
    roll = models.CharField(max_length=9, blank=False, null=False)
    department = models.CharField(max_length=100, blank=False, null=False)
    hostel = models.CharField(max_length=20, blank=False, null=False)

    def __str__(self):
        return self.name
# Create your models here.
 