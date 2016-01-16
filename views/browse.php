<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div id="header">
    <img onclick="Cookies.remove('qEditMode');window.close();" class="headerIconRight iconHover" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAATlBMVEUAAADPz8/Pz8/Pz8/Ozs7Ly8vMzMzMzMzNzc3MzMzNzc3Nzc3Ly8vLy8vMzMzMzMzMzMzMzMzLy8vLy8vMzMzMzMzMzMzMzMzMzMzMzMwVcBZfAAAAGXRSTlMAECAwP0BQX2BvcH+Aj5CvsL/Az9Df4O/wlo1AcQAAAYJJREFUSMedltGWgyAMRIPULVV0FW1J/v9H96HtmkBA2nnzHK8JzBABUHS5juM0jeP1Ai3qbisxrbfuBOjF+0/99h8CRERrCTITFTUZjbAbVbTZnPiJVFXMmnN0KpfUoAaJOja2IJGtx2zUpO3Yt5kaNf87SM16L0d4/vDIH9E/RA6UIrsByxi0YPa8zCoJYAxaAMksAAAd7+q5JW8Gn7tqeG8dAAzs2b99QkYAePbKAABBM8siI4TRAQB0gy3qBFFmysEUCOqzCMfkYGTxc2JpCpMH1ueIYJSIey2SB6MdillD8EBQQ3yFUBllLSiXjzniqoTCuNRKzK3E7JQViBgLTBJLkSudCaXwR+FPGn5+xO5GOPhizD05YqKzzQjPo02n3JKPi82IlESbzMXXVOJl6D6KXMWRd0Xh+9H3xYBNpltZu6kGlojqgf38l/TNjw/g56Q3VP79troHu1WvCpW9nk3pQhJ0IFRvMUsOLP3Z5WoQpcLQNd3Jeuf9PHvv1O//AYTVm1bky/AiAAAAAElFTkSuQmCC" />

    <img onclick="reloadImages();" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAAS1BMVEUAAADPz8/Pz8/Pz8/Ly8vLy8vMzMzMzMzNzc3Nzc3Ly8vMzMzMzMzMzMzMzMzMzMzMzMzLy8vLy8vMzMzMzMzMzMzMzMzMzMzMzMxaC6dhAAAAGHRSTlMAECAwQE9QX2BwgJCfoK+wv8DP0N/g7/CnFObiAAABT0lEQVRIx61W2ZKEIAwkozuLJyyo5P+/dB0RPAA3qdp+jNV06BwoRAbw1Wtta0HGt8YVA5AJtfkQUJIJMCKX4SWwIzOqxTMsWwPpXvU7Q5EZEtki086Y+SIdW4Se1yswkCzSBAa9KArLFkudbaCYV5triqViUbamMOksVJGS5OCbe0zHBEseB1+aGGn1BhMpxgfa8lkO83D7RZYYWSA55Yr9THMKmZhZltFe58GjT4p4grq16s1NmBPGDJfBPq4TKlrdLXD+C0zJWROIR/0xk3Gs6HAJDwRfhLCnoCW5L+C4joPblN6tKfdY97Ph0Lc+IB+6769+DRVVxQHHV7pePynYZJLapzWyVtSl8/pIEXKWvDVSQOz+hkx5uH3p6UT2cu+Ki+cfX5CY15tM0dd5YIhY4BbFVVy7GBr7SlBcBuMfC7ZFqegVFPU6tsM7m9IvCuVIH4t+2XEAAAAASUVORK5CYII="
         class="headerIconRight iconHover">
    <img onclick="uploadImg();" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAAUVBMVEUAAADPz8/Pz8/Pz8/Ly8vMzMzMzMzNzc3MzMzNzc3Nzc3Ly8vLy8vMzMzMzMzMzMzMzMzMzMzMzMzLy8vLy8vMzMzMzMzMzMzMzMzMzMzMzMyC9938AAAAGnRSTlMAECAwQFBfYG9wf4CPkJ+gr7C/wM/Q3+Dv8DuVxxcAAAFmSURBVEjH7ZXLkoMgEEUbIWFMx8mgJMr5/w+dhXkIGmOqZjWVu0M4XLzdoshHfyF7OLbtz5fdDOwvXHXZb3OITBQ3OO0GgKCq2gEM7qXHAEnNODAKDC98zAD9ZI1NMJhVpIGUragSnNaICijO4YBqBdGFLQNc2sPTF4ozk9EGiE+Sg37+sL+W6Hsp4G/oFh4750+LzFj1O+J9HkwAmpzwo3v3GOaMnABXVp2mdnaygZ9F107HLZyr0tLPivZYUh2yGvpbH/vSpr411hGmNfSP3s+Y+h6AifmsB1KAkArGwcXcic6b6ZGTVVCb8v5yQDTX8Hwed7KioGJTOQM6blqk6a2MiNhipgYqaRab5IrMdIZa4sxkDfHQSdkG64iD4X0E6d9Fegmznl5DGgjil28dp+qW7ywvJhU9vaYWeiOy23jzirgI7G6fG/HwUnHS78pm3SNx3TagmyZS1Rq6VQWtq8/v/Z/pF/UML4c6wCQIAAAAAElFTkSuQmCC"
         class="headerIconCenter iconHover">
</div>

<div id="editbar">
    <div id="editbarView" onclick="#" class="editbarDiv"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAB5lBMVEUAAAATZb8glfN8s0L/wQUglvP/wAcUZb8glvN8skH/wQcVZcAhlvMjarQtnPMunO08ouhBdp1Fp/VKp+NPfJFRrfZYrt1csvdds/dquPZtiHp0udJ2vvd8s0KBv82BxPiCwM2CxPiEt02Kk2OKyPiMvFmOyvmQxsiRlVyUwWWZmVeZ0Pma0PqcxXCdxnGgm1Gly32m1fmr0b6s0r2tz4mt2fqz2/q11JW83/u+2aG/4fvEqTXFqjXG3qzI3bLO6PzPrSzQrizR5LzTrynW58PW58TW6/3X7PzX7P3YVwDaXQDasiPbsyPdZADfagHf7NDhcQHiZwHi8f3jcwDj79fj8v3keALk6afm8dvnbwHo8t3phQPpuBfq8uDq8+Hr8+LsegLukgPu9ufvfgPv9ujwggLwgwLwhAPwuhLw9unxhgLxuxLx7qPyigPzjgPznwT1pgX3+vP3+/T4owT4rAX4vQz4vgz5pwX6swb7rwX74oz8vwn9uAb9uQb+vAb+xBX/wAb/wQb/wQf/xBP/xBT/xyP/yB//yCX/yyr/zj7/zzb/1Vn/1k7/2Vj/2Wb/3WX/4IH/4IL/4XL/44//5I7/5JL/65T/7LH/7rj/9NL/9Z3/9bf/9dP/9rj/+OH/+cT/++////9rFgOYAAAAC3RSTlMAkJCQkL+/wMDAwJQZ/TgAAAIeSURBVEjH7dbXV9RAFAfgsQLCgrFiVJCsKGsBYxcEKy6xrS3YsMaOouBaQdi9BBsKFhSNmnj/UyeFJUxmMWfPHp74PUxe5jsz9859CCHTySmz57IhpHAOk5kTyDxgQ0gJm8IQpKxi88JQ5O3wR49sMYz780OQ/l+W9cUlTYZhLAlB3luW9d0law3jbNl/SNI+5U/mlJLlqxxRXrk0G0kqD+n6evjDxI7JqqrKfPLqmHL4OdPkBfKhbaqdZVzSqijKcYAeP2lRvVTxyDXFzsXee48zpHz9mFBXc0hScXNL0154pMrdfcpZFwcILcTJeU3Tbva4pF71ZUOAtLripGbnQa9DZD9ZwZJHJ5ycvkpzu6PjmUNK5T3xeHxnPV22rwk3ljlMcr7J1KRoJRtCitkU5IvENgaJKExGdiEeZIkId4SspFbqQsRYrTRO1jUcoQ3v3tsg8kh1J3ZeouQC4qYM2Z12HimVivIIvRReRjxHP4kMOQrwbuTTAKTqeGQH3TvaB9/op3mMiFSYpvlThycCh0iNXfiGXuIvNkseoQK+UmIOgd2DIKFXcsn1mEeEdoDPNhkEOBDh1zKqw0v/xYRuGPhtmj90aItkKf8K4hk/Kd6XBn1oUId0Da98KYGJu3T/frwRG29yyulymt9kO/ZTVvtfX4zWPQVoq4kuyka2IjayAyO008onm2QpOJZCJF/DP6uIDSEFbGZM/4bkln++2jmbssecSwAAAABJRU5ErkJggg=="
                                                              class="editbarIcon editbarIconLeft">

        <p class="editbarText"><?=Yii::t('bajadev/ckeditor', 'View');?></p></div>
    <a href="#" id="editbarDownload" download>
        <div class="editbarDiv"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAANlBMVEUAAABAUL9AULdAULU9UbY8ULM9ULU+ULU+ULU+ULU+ULQ/ULQ+UbU/UbQ/UbU+ULQ/ULU/UbU/XepgAAAAD3RSTlMAECAwP0Bgf4CQoL/A0PDnFaRjAAAApUlEQVRIx+WUyw7DIAwEAQcKFJzs//9sD3HaRq2KOUR5dE5cRjIre425OHQXSK14CP5givWC3TIxdxPc+RNzUXBbJmYHwZ4/sX9VHAMAxkWZH/xzb+ib0uiZ8KmE1mwJwDQKE4DU/k/GiqxZ4/puVNUyW34ZrFx/ejqsLuWwKEF/lnE2Ys8pZ21Y69hqZyNb5u4OJzJHgAYF61ELFJQdlFQUJHM5HgLQHSOVdI+QAAAAAElFTkSuQmCC"
                                     class="editbarIcon editbarIconLeft">

            <p class="editbarText"><?=Yii::t('bajadev/ckeditor', 'Download');?></p></div>
    </a>

    <div id="editbarUse" onclick="#" class="editbarDiv"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAA3lBMVEUAAABQr1CAz4BCpUJIr1CAx4eAyoWCxoZMr1CAx4OByIRNr1BKr1CAx4VLr1CBx4VMr1CBx4NMr1BFoEhLr1CBx4R0wndJqk1ywHWAxoNLrlBvv3GAx4RMrlBKrE6Bx4NHo0pIqk1Lr1BLrlBDnUdMr1CAxoNBmkUtfDEufTIvfzIwgDMwgTMyhTYzhjc1iTk2jDs4jjw9lUE9lkE+mEI+mUNAnERCmUZCmkZCn0ZDnEhEn0lEokhFoUpFpUpGokpHpUtHqUxIpkxJqU1Jq05KrE5KrE9Lrk9Mr1CBx4R7LofVAAAAKHRSTlMAEBAfICAwP0BAT1BgYHB/gICQnKCgp6yvr7C/v8DE0NjY3+Ds7+/+cwd2JwAAATdJREFUSMftlttSgzAURWO9Va0trXcN3q2N96KC1miLFtn5/x/yQZxBTuQQnfGp6zlrctg7ySDEhL8zO5+x2PpCSillq5ZfNbclZddwrOWMGr/cGGO6OWXBVCO/i7si/kfZc1eWN3dY1tvtb/V5YGkUGm/wylRBqbPGNjlYznMJceQ6lxA+Y+zSE89Ftk8VJrL0mCpMZK+nlrtYrjxFFqU0svdoSBMrj2w0QN0xskFqU8oiG78BTbfIUgBetciSEABCAECnWmQ35zFwrzQA+KJKZI9KXSE+UxfJD8oGUV4ue3dJ3O/1EwAn1Jh+poNdKw0EKgAAUGXlgVFo/QfRuFwhXc5gNCJKGMSADrRd6QBECW8zNGCp//Cz48ImGRqW+pf4d6xY/yqvFLts8gr5Fs9n8Cb/Hb/lA1svTmpNlIp4AAAAAElFTkSuQmCC"
                                                             class="editbarIcon editbarIconLeft">

        <p class="editbarText"><?=Yii::t('bajadev/ckeditor', 'Use image');?></p></div>
    <?php $form = ActiveForm::begin(['options' => ['id' => 'deleteImageForm']]); ?>
    <div id="editbarDelete" onclick="#" class="editbarDiv"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAACG0lEQVRoge2az04bQQyHvwVSkBBS/6DwAO2tPdJLoe/X9rVAgpeAS9tICajQW6QQ3EM81SrZbOxhZiIl+0mrJbPesX/rceJJgEQI7Av8EBgIyIpjIPBd4FUq/8lQEasEzB/f1h33ArVMfDHYnqnt7xKxuQhPOZf9KnZSTbRuWoUIXFjXe+2eLPYCF9FCNg6BW30q7wv6/KA+byz21owM9XwSF1YUwdew1UqxChnpue8OJ57ga9RqpSTLiL4xLBSkd7yGKyN7FiNsS+s80Xggy9LauBpZh5AsNbKOYt+upWVC4I1+OD222DQ2gd7x2vW/avM6PvLFSSuBsU58sMQmmRCBA70+FqgsMZqWVjVzeKcvS9TJ/0KvjK2+p2ksWSfu+vAIKdmmuNoT2NKMdEIi6GrEwsZkpBMSQfo+KyCwK/Ak8CzQa7iepEUR2BOYqq9da3zmjFQwBe5nf3JsvS+CPrO47tSnCe/3WiU2WK4NVcArpMQGy7WhCsQKKZGRToiFrkYcdDXioRPiIF97EhDoaYsykbmHkKJFEdjRuRvboDZcGalgAjww+/L7redeI+907j/qy0zMT285N1juDVUgRkjOOomuj40RYv2hp84yIZdL7D3jRYU0tikVfG0ydo5HtSfwsqWVs9iL1MhPPX/yvte3oXN91Je/Us3b5vBIYOj41wvvMRQ4zC5ExXwWuNZP4VQCJgJXAqcxMf0D87erRrnXggYAAAAASUVORK5CYII="
                                                                class="editbarIcon editbarIconLeft">
        <?=Html::hiddenInput('file', '', ['id' => 'hiddenFileInput']);?>
        <?=Html::hiddenInput('method', 'delete');?>
        <?php ActiveForm::end(); ?>
        <p class="editbarText"><?=Yii::t('bajadev/ckeditor', 'Delete');?></p></div>
         <img onclick="hideEditBar();" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyBAMAAADsEZWCAAAAKlBMVEUAAAAwMDAwMDAxMTEwMDAyMjIyMjIyMjIzMzMzMzMyMjIzMzMyMjIzMzM5CYrKAAAADXRSTlMAEDA/QI+Qn6C/wM/QaZsPiQAAAO9JREFUOMvV1LENwjAQhWGDEE5JDRRIMAETICZgEaR0VJFS0rhgFAagYABaQMC/C0W485EjA5DK0emL7Xt2QvjjZ2nGc1uYsNFx5JALvRM3fal4jgyBUgkctXICRRXwlMIAFEUAVp9KHxRVAMwEJUUNueo8haKG1HnZghpyNzsV5IignSOC8ESQJxbV7RxSB8mo9uGlDiLbv/lC/Hyt7CA/UNRVlx3EoWi6U/4ge48kl+SQ5FK0UY6yjbbasRbqm46lr1M1ME0uvk5iuJgmJ+Ch80xNLgVwzrfkYnJJvPItCWMT5dCQEMLajBf//Ft5A0jiG3nZBIYEAAAAAElFTkSuQmCC"
         class="editbarIcon editbarIconRight">

</div>

<div id="updates" class="popout"></div>

<div id="dropzone" class="dropzone"
     ondragenter="return false;"
     ondragover="return false;"
     ondrop="drop(event)">
    <p>
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAMAAABHPGVmAAAAV1BMVEUAAABgYGBoaGhlZWVlZWVkZGRkZGRmZmZmZmZlZWVlZWVmZmZmZmZmZmZmZmZlZWVlZWVmZmZmZmZlZWVlZWVlZWVlZWVmZmZmZmZlZWVlZWVmZmZmZmbUBw9cAAAAHHRSTlMAECAwP0BPUF9gb3B/gI+Qn6CvsL/Az9Df4O/wQqu59AAAAgVJREFUaN7tmdFiqyAMhoPiOqtdZVVpIe//nOdinfOsE5IgXvFftuJn8hMCClBUVFRUVHS4lNZaa13lur8+DzMuun/2em/C2+DwRW542zFH/R03dO/VTgiHAbk9MOcgAhHRvSciqhEJGpOCOTkkyZ3kjB7JOksZAzI0HMAQUpgMEaVDtjouo0WBmHOschKI49XLiCKNrCJEoVo6ow4ly9r0hKn3z6Afvqp84O8LAdFEq6MBaJJCqUdaLXTyUNRH3FjzdakJhBIOY44z7DMZysomWEsoP79shQLm3xKXkWY1Q7avUkmMjraAbq1gDYVh/h+zab77e99HWg7trzSoYOX3lWQ59C+jgpWPOCh+f2rYSXbrIcpJu17s6T5+Lr3wTY+a/9L2Hd90kvlrSisxnWj+kuabyHRyhdUAACpxqxMzf1akdm7CHcIQHvEiNZ1q/h0AphhkHn90/b7zdfVjrA+1ADMyNH1DJsagGQCzQ1AdATkdATFHQCbwR0Cm/BAXLdgdIMg7tkkhdX6IB5bzUuNZpkjrhJUvGaQFAJsbUvGO7CKIBWCFMuunOA3iq3uzZjFb/tlZrzkhyyHS5mM8li2C8tkgqz1b7XMnKyPl156ttvkZAMrkZwDA6bFvgfz92kBddnTGbG5vVbeTNSb8HafubonxPExLerfWJKh8lCsqKioqyqN/OZryPxfocM0AAAAASUVORK5CYII="><br>
        <?=Yii::t('bajadev/ckeditor', 'Drop files here or click to upload.');?>
    </p>
</div>
<div id="files">
    <?php
    echo $images;
    ?>
</div>

<div id="imageFullSreen" class="lightbox popout">
    <div class="buttonBar">
        <button id="imageFullSreenClose" class="headerBtn"
                onclick="$('#imageFullSreen').hide(); $('#background').slideUp(250, 'swing');"><?=Yii::t('bajadev/ckeditor', 'Close');?></button>
        <a href="#" id="imgActionDownload" download>
            <button class="headerBtn"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAANlBMVEUAAABAUL9AULdAULU9UbY8ULM9ULU+ULU+ULU+ULU+ULQ/ULQ+UbU/UbQ/UbU+ULQ/ULU/UbU/XepgAAAAD3RSTlMAECAwP0Bgf4CQoL/A0PDnFaRjAAAApUlEQVRIx+WUyw7DIAwEAQcKFJzs//9sD3HaRq2KOUR5dE5cRjIre425OHQXSK14CP5givWC3TIxdxPc+RNzUXBbJmYHwZ4/sX9VHAMAxkWZH/xzb+ib0uiZ8KmE1mwJwDQKE4DU/k/GiqxZ4/puVNUyW34ZrFx/ejqsLuWwKEF/lnE2Ys8pZ21Y69hqZyNb5u4OJzJHgAYF61ELFJQdlFQUJHM5HgLQHSOVdI+QAAAAAElFTkSuQmCC" class="headerIcon">
            </button>
        </a>
        <button class="headerBtn greenBtn" id="imgActionUse" onclick="#" class="imgActionP"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAA3lBMVEUAAABQr1CAz4BCpUJIr1CAx4eAyoWCxoZMr1CAx4OByIRNr1BKr1CAx4VLr1CBx4VMr1CBx4NMr1BFoEhLr1CBx4R0wndJqk1ywHWAxoNLrlBvv3GAx4RMrlBKrE6Bx4NHo0pIqk1Lr1BLrlBDnUdMr1CAxoNBmkUtfDEufTIvfzIwgDMwgTMyhTYzhjc1iTk2jDs4jjw9lUE9lkE+mEI+mUNAnERCmUZCmkZCn0ZDnEhEn0lEokhFoUpFpUpGokpHpUtHqUxIpkxJqU1Jq05KrE5KrE9Lrk9Mr1CBx4R7LofVAAAAKHRSTlMAEBAfICAwP0BAT1BgYHB/gICQnKCgp6yvr7C/v8DE0NjY3+Ds7+/+cwd2JwAAATdJREFUSMftlttSgzAURWO9Va0trXcN3q2N96KC1miLFtn5/x/yQZxBTuQQnfGp6zlrctg7ySDEhL8zO5+x2PpCSillq5ZfNbclZddwrOWMGr/cGGO6OWXBVCO/i7si/kfZc1eWN3dY1tvtb/V5YGkUGm/wylRBqbPGNjlYznMJceQ6lxA+Y+zSE89Ftk8VJrL0mCpMZK+nlrtYrjxFFqU0svdoSBMrj2w0QN0xskFqU8oiG78BTbfIUgBetciSEABCAECnWmQ35zFwrzQA+KJKZI9KXSE+UxfJD8oGUV4ue3dJ3O/1EwAn1Jh+poNdKw0EKgAAUGXlgVFo/QfRuFwhXc5gNCJKGMSADrRd6QBECW8zNGCp//Cz48ImGRqW+pf4d6xY/yqvFLts8gr5Fs9n8Cb/Hb/lA1svTmpNlIp4AAAAAElFTkSuQmCC" class="headerIcon"> <?=Yii::t('bajadev/ckeditor', 'Use image');?>
        </button>
    </div>
    <br><br>
    <img id="imageFSimg" src="#" style="#"><br>
</div>

<div id="uploadImgDiv" class="lightbox popout">
    <div class="buttonBar">
        <button class="headerBtn" onclick="$('#uploadImgDiv').hide(); $('#background2').slideUp(250, 'swing');"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAARVBMVEUAAAD/QDD0Qzb0QjXzQzbzQzb0QzXzQjX0QzX0Qjb0Qzb0TUH1WE32Ylj3bWT4gnv7q6j+1tf/4OL/4eP/5ef/6u7/6+7KsWMrAAAACnRSTlMAEF9gr7C/wM/QPlKNYAAAAOVJREFUSMft1ssSgjAMBVAQkGeMUrj//6kuZGqfSYeNLrhrznSaZBqq6srZ3Nq7kPYWgXqYlAx1QFQxTYMvmqkgjUe6EtJ5pC8h/W/Jw/9u1gnj6QpeSSMMuIaBr0mT2cA1DADrLJ9CrmEAAGt3cUwg8hWzJhRCXw4TCamVHxMJsfvWcPnA0JYQMuEd8HuqEQZSRiAMAPsWmTw5qksmNFli+xGZ/PDbWoVGGH5b3cCkyeL3gwwAs+insDcHhvS7eD2nF+kVW/71HSslJ57xE8uiGnUxhotPNWMdbcum64V0zfUDcjpvvt8+Q/SARtkAAAAASUVORK5CYII=" class="headerIcon"></button>
        <button class="headerBtn greenBtn" name="submit" onclick="$('#uploadImgForm').submit();"><img
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAAPFBMVEUAAAAAj48Al4cAlYoAlooAl4cAlYcAlokAl4kAlYcAlYgAlYgAlocAlogAlocAlYgAlogAlogAlYgAloiBJbnOAAAAE3RSTlMAECAwP0BgcH+AkJ+gv8DP0N/vAbxogAAAAKJJREFUSMftlcESwiAMBZtEqqBCm/z/v3oQBnU69nFAW8c9d2faTaDD8HOEK0B4UqIBxC8o4gBkE9ml+TVonqlRmcxSm3ExMzu3GP4+iCNujGV4IxxLi6JgNtK6Iwplo/S4V4nQWBUgW3jdXw/Hqqxkk6Vz8jYb65KivP49rjzs4On/lQ8oVC476nmH8SnD+y/GPsM9i9EhQ/svJjGzjR9qR26iUiC34FEiZAAAAABJRU5ErkJggg==" class="headerIcon"> <?=Yii::t('bajadev/ckeditor', 'Upload');?>
        </button>
    </div>
    <br><br><br>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'uploadImgForm']]); ?>
    <p class="uploadP"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAAilBMVEUAAAAAgI/P398AgI/P198AhY/P2t8Ag4/P19sAg4/P2dwAgo/P19zP2N0Ago8Ag4/P19sAg44XjJjP2NzP2dwAg47P19zP2NwAgo7P2NwAgo5Fn6nP19vP2NsAgo7P2NwAg47P2NwAg47O2NwAg483R09JWWBSYWlTYmpvfYODj5W8xsrFztPP2NxrTGn0AAAAJHRSTlMAEBAgIDAwQEBQUGBgb3CAgJCQkJ+goK+wv8DAwM/Q3+Dv8PAPB2OYAAAA2UlEQVRIx+3WuRaCMBAF0LAJyiqKCggoGpTt/39PCuEIZoakspBXheKSR4oMhCyZZmUfwy57W+UEVtIOCTccQA3bUUJ5ttO1nSSbMXIvmqpq3ssEN+f+3Q9Kn/16hwljqEO7DA/YwR3YBNvmxiYZclwtmyDNLIgYIPEg4vGQgtJCkNRlWQuScX5N4juQeCHs+BDxQeJCxP0LYkJEB4kGEQW+YnK2uCD3WMAmW4Towr0IiUQ3IURifE0q4QNGy0UFIcqkWyRxTEsz/QBrzpmsOaeoS+Aoyw/NV17A24VD9mhfdQAAAABJRU5ErkJggg==" class="headerIcon"> <?=Yii::t('bajadev/ckeditor', 'Please choose image');?>:</p>
    <input type="file" name="upload" id="upload">
    <br>
    <br>
    <?php ActiveForm::end(); ?>
</div>

<div id="background" class="background" onclick="$('#imageFullSreenClose').trigger('click');"></div>
<div id="background2" class="background"
     onclick="$('#uploadImgDiv').hide(); $('#background2').slideUp(250, 'swing');"></div>
<div id="background3" class="background"
     onclick="$('#settingsDiv').hide(); $('#background3').slideUp(250, 'swing');"></div>
