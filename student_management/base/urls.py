from django.urls import path
from . import views

urlpatterns = [
    path('', views.home, name='home'),
    path('login/', views.loginPage, name='login'),
    path('logout/', views.logoutUser, name='logout'),
    path('delete/<str:pk>/', views.deleteStudent, name='delete'),
    path('edit/<str:pk>/', views.editStudent, name='edit'),
    path('add/', views.addStudent, name='add'),
]
  