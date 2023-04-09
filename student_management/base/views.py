from django.shortcuts import render,redirect
from .models import Student
from django.contrib.auth.models import User
from .forms import StudentForm
from django.contrib.auth.decorators import login_required
from django.contrib.auth import authenticate, login, logout
from django.contrib import messages
from django.db.models import Q
from django.core.paginator import Paginator

def loginPage(request):
    page='login'
    if request.user.is_authenticated:
        return redirect('home')
    if request.method=='POST':
        username=request.POST.get('username')
        password=request.POST.get('password')
        try:
            user=User.objects.get(username=username)    
        except:
            messages.error(request, 'User does not exist')

        user=authenticate(request, username=username, password=password)    
        if user is not None:
            login(request, user)
            return redirect('home')
        else:
            messages.error(request, 'Username OR password is incorrect')

    context={'page':page}
    return render(request, 'base/login.html', context)

def logoutUser(request):
    logout(request)
    return redirect('home')    

def home(request):
    q=request.GET.get('q') if request.GET.get('q')!=None else ''
    students=Student.objects.filter(
        Q(name__icontains=q) | Q(hostel__icontains=q) | Q(department__icontains=q) | Q(roll__icontains=q) 
    )
    p=Paginator(students, 12)
    page=request.GET.get('page')
    student_list=p.get_page(page)

    context={'students': students, 'student_list':student_list}
    return render(request, 'base/home.html', context)
@login_required(login_url='login')
def deleteStudent(request,pk):
    student=Student.objects.get(id=pk) 
    if request.method=='POST':
        student.delete()
        return redirect('home')
    return render(request, 'base/delete.html',{'obj':student})

@login_required(login_url='login')
def editStudent(request,pk):
    student=Student.objects.get(id=pk)
    form=StudentForm(instance=student)
    if request.method=='POST':
        form=StudentForm(request.POST, instance=student)
        if form.is_valid():
            form.save()
            return redirect('home')
    context={'form':form}
    return render(request, 'base/student_form.html',context)   

@login_required(login_url='login')
def addStudent(request):
    form=StudentForm()
    if request.method=='POST' :
        form=StudentForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('home')
    context={'form':form}
    return render(request, 'base/student_form.html',context)     