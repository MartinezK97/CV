<?php $styles = $this->getData['vars'];?>
<style id="stylesUserSettings">
        :root{
            /* Header color */
            --headerColor: <?php echo $styles['headerColor'];?>;
            
            /* Name color */
            --nameColor: <?php echo $styles['nameColor'];?>;

            /* prof  color */
            --profColor: <?php echo $styles['profColor'];?>;

            --primaryColor: <?php echo $styles['primaryColor'];?>;
            --titleColor: <?php echo $styles['titleColor'];?>;
            --subtitleColor: <?php echo $styles['subtitleColor'];?>;
            --borderRadiusBox: <?php echo $styles['borderRadiusBox']."px";?>;
            --borderRadiusPicture: <?php echo $styles['borderRadiusPicture']."px";?>;
            --fontSizeHeader: <?php echo $styles['fontSizeHeader']."px";?>;
            --fontSizeHeader2: <?php echo $styles['fontSizeHeader2']."px";?>;
            --borderWidthImg: <?php echo $styles['borderWidthImg']."px";?>;
            /* --stylesUserPictureProfile: <?php echo "url(../img/stylesUsers/".$styles['foto'].");"?>; */
            --picturePositionTop: <?php echo $styles['picturePosition']['top']?>;
            --picturePositionLeft: <?php echo $styles['picturePosition']['left']?>;
            --stylesUserPicturePosition: var(--stylesUserPicturePositionX) var(--stylesUserPicturePositionY);
            --stylesUserPictureSize: <?php echo $styles['foto_z']."%";?>;
        }

        /* input.headerColor{ fill:var(--headerColor) !important; } */
        .profColor{ color:var(--profColor) !important; }
        .nameColor{ color:var(--nameColor) !important; }
        .titleColor{ color:var(--titleColor) !important; }


        
    </style>