function check_input() /*login_form.php파일의 check_input()에서 실행됨*/
{
    if (!document.login_form.id.value)
    {
        alert("아이디를 입력하세요");    
        document.login_form.id.focus();
        return;
    }

    if (!document.login_form.pass.value)
    {
        alert("비밀번호를 입력하세요");    
        document.login_form.pass.focus();
        return;
    }
    document.login_form.submit(); /**/
}

/*로그인 페이지의 아이디와 비밀번호 입력 창에 데이터가 있는지 검사 후 경고 창 출력. */